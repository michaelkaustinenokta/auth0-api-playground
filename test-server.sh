#!/bin/bash

# Test script for Auth0 Proxy Server
# This script runs various tests to verify server functionality

echo "======================================================================"
echo "Auth0 Proxy Server - Test Suite"
echo "======================================================================"
echo ""

BASE_URL="http://localhost:3000"
PASS="\033[0;32m✓ PASS\033[0m"
FAIL="\033[0;31m✗ FAIL\033[0m"

# Color codes
GREEN='\033[0;32m'
RED='\033[0;31m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Test counter
TESTS_PASSED=0
TESTS_FAILED=0

# Function to run a test
run_test() {
    local test_name="$1"
    local expected="$2"
    local actual="$3"

    echo -n "Testing: $test_name ... "

    if echo "$actual" | grep -q "$expected"; then
        echo -e "${GREEN}✓ PASS${NC}"
        ((TESTS_PASSED++))
    else
        echo -e "${RED}✗ FAIL${NC}"
        echo "  Expected: $expected"
        echo "  Got: $actual"
        ((TESTS_FAILED++))
    fi
}

echo "----------------------------------------------------------------------"
echo "1. Health Check Tests"
echo "----------------------------------------------------------------------"

RESPONSE=$(curl -s "$BASE_URL/health")
run_test "Health endpoint returns status ok" '"status":"ok"' "$RESPONSE"
run_test "Health endpoint returns uptime" '"uptime"' "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "2. Domain Validation Tests"
echo "----------------------------------------------------------------------"

# Test blocked domain
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://httpbin.org/get'\''",
    "requestType": "GET"
  }')
run_test "Block non-allowed domain (httpbin.org)" "Domain not allowed" "$RESPONSE"

# Test allowed subdomain
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://dev-test.auth0app.com/api/v2'\''",
    "requestType": "GET"
  }')
run_test "Allow auth0app.com subdomain" "REQUEST_ERROR\|ENOTFOUND" "$RESPONSE"

# Test another blocked domain
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://malicious.com'\''",
    "requestType": "GET"
  }')
run_test "Block malicious.com" "Domain not allowed: malicious.com" "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "3. Input Validation Tests"
echo "----------------------------------------------------------------------"

# Test missing curlData
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{}')
run_test "Reject missing curlData" "curlData is required" "$RESPONSE"

# Test invalid requestType
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://test.com'\''",
    "requestType": "INVALID"
  }')
run_test "Reject invalid requestType" "must be one of" "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "4. CSS File Scanner Tests"
echo "----------------------------------------------------------------------"

# Test new API endpoint
RESPONSE=$(curl -s "$BASE_URL/api/css-files?scan=true")
run_test "New API CSS scanner returns array" '\[.*\.css.*\]' "$RESPONSE"

# Test legacy endpoint
RESPONSE=$(curl -s "$BASE_URL/test.php?scanForCss")
run_test "Legacy CSS scanner returns array" '\[.*\.css.*\]' "$RESPONSE"

# Test missing scan parameter
RESPONSE=$(curl -s "$BASE_URL/api/css-files")
run_test "CSS scanner requires scan parameter" "Missing scan=true" "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "5. Legacy Endpoint Compatibility Tests"
echo "----------------------------------------------------------------------"

# Test legacy POST endpoint
RESPONSE=$(curl -s -X POST "$BASE_URL/test.php" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://httpbin.org'\''",
    "requestType": "GET"
  }')
run_test "Legacy POST endpoint forwards to proxy" "Domain not allowed" "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "6. Error Handling Tests"
echo "----------------------------------------------------------------------"

# Test 404
RESPONSE=$(curl -s "$BASE_URL/nonexistent")
run_test "404 for non-existent endpoint" "Not found" "$RESPONSE"

# Test protocol validation
RESPONSE=$(curl -s -X POST "$BASE_URL/api/proxy" \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''ftp://test.com'\''",
    "requestType": "GET"
  }')
run_test "Block non-HTTP/HTTPS protocols" "Only HTTP/HTTPS protocols allowed" "$RESPONSE"

echo ""
echo "----------------------------------------------------------------------"
echo "7. Security Header Tests"
echo "----------------------------------------------------------------------"

HEADERS=$(curl -s -I "$BASE_URL/health")
run_test "X-Content-Type-Options header present" "X-Content-Type-Options" "$HEADERS"

echo ""
echo "======================================================================"
echo "Test Summary"
echo "======================================================================"
echo -e "${GREEN}Passed: $TESTS_PASSED${NC}"
echo -e "${RED}Failed: $TESTS_FAILED${NC}"
echo "Total: $((TESTS_PASSED + TESTS_FAILED))"
echo ""

if [ $TESTS_FAILED -eq 0 ]; then
    echo -e "${GREEN}All tests passed! ✓${NC}"
    exit 0
else
    echo -e "${RED}Some tests failed. Please review the output above.${NC}"
    exit 1
fi
