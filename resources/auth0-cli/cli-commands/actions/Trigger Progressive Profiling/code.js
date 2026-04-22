/**
* @param {Event} event - Details about the user and the context in which they are logging in.
* @param {PostLoginAPI} api - Interface whose methods can be used to change the behavior of the login.
*/

//const progressiveProfilingFormId = "##PROGRESSIVE_PROFILING_FORM_ID##"

const progressiveProfilingFormID = "##PROGRESSIVE_PROFILING_FORM_ID##"

const progressiveProfilingFavoriteStoreElementId = "##PROGRESSIVE_PROFILING_FAVORITE_STORE_ELEMENT_ID##"

const progressiveProfilingNewsletterPreferencesElementId = "##PROGRESSIVE_PROFILING_NEWSLETTER_PREFERENCES_ELEMENT_ID##"

exports.onExecutePostLogin = async (event, api) => {
  const triggerProgressiveProfiling = event.request.query['ext_trigger_progressiveprofiling'];

  if (triggerProgressiveProfiling) {
    api.prompt.render(progressiveProfilingFormID);
  }
}

/**
* @param {Event} event - Details about the user and the context in which they are logging in.
* @param {PostLoginAPI} api - Interface whose methods can be used to change the behavior of the login.
*/
exports.onContinuePostLogin = async (event, api) => {

  const favoriteStoreDropdownValue=event.prompt.fields[progressiveProfilingFavoriteStoreElementId]
  const newsletterDropdownValue=event.prompt.fields[progressiveProfilingNewsletterPreferencesElementId]

  if (favoriteStoreDropdownValue && favoriteStoreDropdownValue.trim() !== "") {
    api.user.setUserMetadata("favorite_store", favoriteStoreDropdownValue);
    
    // Optional: Set a custom claim in the ID Token so the app sees it immediately
    api.idToken.setCustomClaim("https://modular-app.com/favorite_store", favoriteStoreDropdownValue);
  }

  if (newsletterDropdownValue && newsletterDropdownValue.trim() !== "") {
    api.user.setUserMetadata("newsletter_preferences", newsletterDropdownValue);
    
    // Optional: Set a custom claim in the ID Token so the app sees it immediately
    api.idToken.setCustomClaim("https://modular-app.com/newsletter_preferences", newsletterDropdownValue);
  }
}

