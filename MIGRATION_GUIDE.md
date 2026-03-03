# Migration Guide: PHP to Node.js

## The Problem You Had

When switching from `test.php` to `run.js`, responses showed as `[object Object]` in your application.

### Root Cause
- **PHP**: `curl_exec()` returns **raw strings** (JSON as text)
- **Node.js (before fix)**: axios parsed JSON into **objects**
- **Your app**: Expected strings, got objects → displayed as `[object Object]`

### The Fix Applied ✅
Added `responseType: 'text'` to axios configuration in `run.js`:

```javascript
const config = {
  // ... other config
  responseType: 'text', // ← Returns raw string like PHP
};
```

This makes axios behave exactly like PHP's `curl_exec()` - everything is returned as a raw string.

---

## How to Update Your Application

### Option 1: Minimal Change (Recommended)

Just update the URL - everything else stays the same:

```javascript
// BEFORE (PHP):
$.ajax({
    url: "test.php",
    type: "post",
    data: {
        curlData: $('#curlDataTextarea').val(),
        requestType: requestType
    },
    success: function(response) {
        // response is a string (JSON text)
        console.log(response);
    }
});

// AFTER (Node.js):
$.ajax({
    url: "http://localhost:3000/test.php",  // ← Only change this
    type: "post",
    data: {
        curlData: $('#curlDataTextarea').val(),
        requestType: requestType
    },
    success: function(response) {
        // response is STILL a string (JSON text) - same as before!
        console.log(response);
    }
});
```

**That's it!** The response format is identical to PHP.

---

## Response Format Comparison

### PHP `test.php` Response
```javascript
// Raw string returned by curl_exec()
'{"id":123,"name":"John","status":"active"}'
```

### Node.js `run.js` Response (AFTER FIX)
```javascript
// Raw string returned by axios with responseType: 'text'
'{"id":123,"name":"John","status":"active"}'
```

### Before the Fix (BROKEN)
```javascript
// Parsed object returned by axios
{id: 123, name: "John", status: "active"}  // ← Displays as [object Object]
```

---

## If You Were Parsing JSON in Your App

If your app was doing this:

```javascript
success: function(response) {
    var data = JSON.parse(response);  // Parse the JSON string
    console.log(data.name);
}
```

**Good news:** This still works! The response is still a string, so `JSON.parse()` works exactly the same.

---

## Complete Example

### Your HTML/JS File (Minimal Changes)

```html
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <textarea id="curlDataTextarea"></textarea>
    <button onclick="sendRequest('POST')">Send</button>

    <script>
        function sendRequest(requestType) {
            $.ajax({
                url: "http://localhost:3000/test.php",  // ← Point to Node.js server
                type: "post",
                data: {
                    curlData: $('#curlDataTextarea').val(),
                    requestType: requestType
                },
                success: function(response) {
                    // response is a string, same as PHP!
                    console.log(response);

                    // If it's JSON, parse it:
                    try {
                        var json = JSON.parse(response);
                        console.log("Parsed:", json);
                    } catch(e) {
                        console.log("Not JSON, raw text:", response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    console.log("Response:", xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>
```

---

## Error Handling

Errors are returned as JSON strings (same format):

```javascript
// Error from Node.js server
'{"error":"Domain not allowed: malicious.com","code":"SECURITY_ERROR","timestamp":"2026-03-03T08:00:00.000Z"}'

// In your error handler:
error: function(xhr, status, error) {
    var errorData = JSON.parse(xhr.responseText);
    alert("Error: " + errorData.error);
}
```

---

## Port Configuration

### Development (Different Ports)

If your HTML is served from Apache (port 80/8080):
- Apache: `http://localhost:80/yourapp/index.html`
- Node.js API: `http://localhost:3000/test.php`

Use full URL in AJAX:
```javascript
url: "http://localhost:3000/test.php"
```

CORS is enabled, so cross-port requests work! ✅

### Production (Same Port)

Option 1: Use a reverse proxy (nginx) to route requests
```
/test.php → http://localhost:3000/test.php
/yourapp/ → http://localhost:80/yourapp/
```

Option 2: Change Node.js port to 80 and stop Apache
```bash
# In .env
PORT=80
```

---

## Testing Checklist

- [ ] Server starts: `npm start`
- [ ] Health check works: `curl http://localhost:3000/health`
- [ ] Update AJAX URL to `http://localhost:3000/test.php`
- [ ] Test a request - should see string response (not [object Object])
- [ ] Test error handling - errors should be JSON strings
- [ ] Test with real Auth0 API calls

---

## Common Issues

### Issue: Still seeing [object Object]
**Solution:** Make sure you restarted the Node.js server after the fix

```bash
# Stop the server
pkill -f "node run.js"

# Start it again
npm start
```

### Issue: CORS errors in browser console
**Solution:** CORS is already enabled in the server. Check:
1. Are you using the full URL? `http://localhost:3000/test.php`
2. Is the server running? Check `http://localhost:3000/health`

### Issue: "Domain not allowed" error
**Solution:** The domain you're trying to reach isn't in the allowlist.

Add it to `.env`:
```env
ALLOWED_DOMAINS=auth0app.com,auth.kausti.com,localhost,yourdomain.com
```

Restart the server.

---

## Why This Fix Works

| Aspect | PHP | Node.js (Before) | Node.js (After Fix) |
|--------|-----|------------------|---------------------|
| HTTP Library | cURL | axios | axios |
| Response Type | Raw string | Auto-parsed | Force raw string |
| Configuration | N/A | default | `responseType: 'text'` |
| Output | `echo $string` | `res.json(object)` | `res.send(string)` |
| In Your App | String ✅ | Object ❌ | String ✅ |

---

## Summary

✅ **Fixed**: Added `responseType: 'text'` to axios
✅ **Result**: Responses are now raw strings, exactly like PHP
✅ **Action Required**: Just change the URL to `http://localhost:3000/test.php`
✅ **Compatibility**: 100% backward compatible with your existing code

**No other changes needed!** Your application will work exactly as it did with PHP.
