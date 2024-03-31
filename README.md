# Purgerplugin for Mantisbt
Plugin that allows to purge issues based upon age/status

Version 1.0.0
Copyright 2024 Cas Nuy

## description

This plugin will purge issues in bul so one does not need to use a tool like phpMyAdmin.<br>
Just define the minimum Status the issues should have and give the date untill when all issues should be purged.<br>
It will take into account the project selction made in Mantis itself.<br>
NB<br>
If you have not selected a specific project, it will review ALL issues.<br>
If you select a project, it will also review the child projects.<br>

## Requirements

Mantis 2.x

## Installation

Copy the Purger directory into the plugins folder of your installation.<br>
After copying to your webserver:<br>
- Start Mantis as administrator<br>
- Select manage<br>
- Select manage Plugins<br>
- Select Install behind Purger 1.0.0<br>
- Click on the plugin name for further configuration (se below)<br>


## Configuration

- Set lifetime of the Captcha image (default = 60)
- Set length of the Captcha text (default = 5

## License

Released under the [GPL v3 license](http://opensource.org/licenses/GPL-3.0).


## Support

Please visit https://github.com/mantisbt-plugins/Purger

## Changes

Version 1.0.0	31-03-2024	Initial release 
