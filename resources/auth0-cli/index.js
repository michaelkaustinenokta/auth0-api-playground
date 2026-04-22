const express = require('express');
const app = express();
const { deploy } = require('auth0-deploy-cli');
const yaml = require('js-yaml');
const fs = require('fs');
const PORT = 3030;

const config = {
  AUTH0_DOMAIN: 'sandbox-kaustinen.cic-demo-platform.auth0app.com',
  AUTH0_CLIENT_ID: 'gOz2nNzgnjW8apFRLfRARESNDyZ5gbdI',
  AUTH0_CLIENT_SECRET: 'x63490DCmu9HY5gRIUbdNpMGcUUYqPQQJlZ07jSH3V2USdp0XJipbhr-YYG5XvvU', // Use the secret from your dashboard
  AUTH0_ALLOW_DELETE: false, // Set to true only if you want to wipe items NOT in your yaml
  AUTH0_KEYWORD_REPLACE_MAPPINGS: {
    PROGRESSIVE_PROFILING_FORM_ID: "PROGRESSIVE_PROFILING_FORM_1",
    PROGRESSIVE_PROFILING_FAVORITE_STORE_ELEMENT_ID: "PROGRESSIVE_PROFILING_FAVORITE_STORE_1",
    PROGRESSIVE_PROFILING_NEWSLETTER_PREFERENCES_ELEMENT_ID: "PROGRESSIVE_PROFILING_NEWSLETTER_PREFERENCES_1"  
  }
};


// This handles the "GET" variables
app.get('/', async (req, res) => { // Added 'async'
  const yamlPath = req.query['yamlPath']; 
  
  if (!yamlPath) {
    return res.status(400).send("Missing yamlPath parameter.");
  }

  try {
    const fullPath = `./cli-commands/${yamlPath}`;
    
    // Check if file even exists first
    if (!fs.existsSync(fullPath)) {
      return res.status(404).send(`File not found: ${yamlPath}`);
    }

    const yamlToImport = fs.readFileSync(fullPath, 'utf8');
    
    if (isYaml(yamlToImport)) {
      console.log("🚀 Valid YAML detected. Starting import...");
      
      // Wait for the import to finish
      await importConfig(yamlPath); 
      
      res.send(`✅ Successfully imported: ${yamlPath}`);
    } else {
      res.status(400).send(`❌ Boop! The file ${yamlPath} is not valid YAML.`);
    }
  } catch (error) {
    console.error(error);
    res.status(500).send(`🔥 Server Error: ${error.message}`);
  }
});

app.listen(PORT, () => {
  console.log(`🚀 Server running at http://localhost:${PORT}`);
});

function isYaml(str) {
  try {
    // Attempt to load the string
    const doc = yaml.load(str);
    
    // Check if it's an object or array (YAML usually isn't just a plain string or number)
    return (typeof doc === 'object' && doc !== null);
  } catch (e) {
    // If it throws an error, it's definitely not valid YAML
    return false;
  }
}

async function importConfig(yamlPath) {

  try {
    
    console.log('./cli-commands/'+yamlPath)
    await deploy({
      input_file: './cli-commands/'+yamlPath, // 
      config: config,
    });

    console.log('✅ Import successful! Your tenant has been updated.');
  } catch (err) {
    console.error('❌ Import failed:', err);
  }
}