# eve-local-analysis-tool
A tool for text entry analysis and reporting.

A PHP-based application. Eventually a JS based UI and Java DB will be implemented, but no idea on the when. Probably also a client side application to capute the clipboard on update to cut down on necessary clicks. Eve Online CREST integration is planned for more advanced functionality. An additional application to update the backend will eventually be created once I migrate it to a database.

The application is fully functional, feel free to use my hosted version at (REDACTED) - it does no logging of your data (for full transparency it will log you made a request behidn the scenes, but not the contents of it).

Use:

  1) Past the analysis text in the provided text area
        -This text must be in the format of a single name per line
  2) Read output sorted into "eyes" and "hunters"
  2) Hit reset to analyse again

Note: The code available here does not include a database of lookup names - instead a .json file with only the base structure is provided. This is to protect the intel collected.

All Rights Reserved - if you want to use it for non-commercial purposes, chat to me, I'm usually pretty ok about letting people use my work, but I'd rather have control of it instance by instance. I can be contacted through my site (linked above) or at (REDACTED).
