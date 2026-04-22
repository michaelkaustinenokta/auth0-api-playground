exports.onExecutePostLogin = async (event, api) => {
  // Check if the user logged into an organization
  console.log(event)
  
  const triggerOrgnameInToken = event.request.query['ext_trigger_orgnameintoken'];

  if (triggerOrgnameInToken) {
    if (event.organization) {
      // You can use any custom namespace (e.g., https://my-app.com/org_name)
      const namespace = 'https://modular-app.com';
      
      // Add the organization name to the ID Token
      api.idToken.setCustomClaim(`${namespace}/org_name`, event.organization.name);

      // Add it to the Access Token if your backend needs it
      api.accessToken.setCustomClaim(`${namespace}/org_name`, event.organization.name);
    }
  }
};