/**
 * @param {Event} event - Details about the user and the context in which they are logging in.
 * @param {PostLoginAPI} api - Interface whose methods can be used to change the behavior of the login.
 */
exports.onExecutePostLogin = async (event, api) => {
  // We only want to challenge for MFA if the user has enrolled in at least one factor.
  // The 'event.user.multifactor' array contains a list of enrolled factors (e.g., ['otp', 'push-notification']).
  console.log("Triggering MFA...")
  console.log(event)

  const triggerMfa = event.request.query['ext_trigger_mfa'];

  if (triggerMfa) {

      const userHasMfaEnrolled = event.user.enrolledFactors && event.user.enrolledFactors.length > 0;

      if (userHasMfaEnrolled) {
        // The 'any' policy will prompt the user to select from any of their enrolled factors.
        // This is the most flexible and user-friendly option.
                api.authentication.challengeWith({ type: 'email' }); 


      }
      else {
        api.access.deny('⚠️ User not enrolled in MFA');
      }
  }
};
