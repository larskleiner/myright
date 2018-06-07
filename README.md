# myright

## Requirements
* PHP 7.1.3 or higher as this is a Symfony 4.1 app
* wkhtmltopdf (<https://wkhtmltopdf.org/>) needs to be installed as this app uses the KnpSnappyBundle (<https://github.com/KnpLabs/KnpSnappyBundle>)

## Installation
* Clone this repository to a *nix environment of your choice (tested to run on a Mac)
* The path to the wkhtmltopdf binary may need to be adjusted in `/myright/config/packages/knp_snappy.yaml` if you didn't install it into `/usr/local/bin/wkhtmltopdf`

## Usage
You can either use the shell script `/myright/googlesearch2pdf` or the Symfony console command.

### Shell script
* `cd myright`
* `./googlesearch2pdf [search term] [number of total results]`

### Console command
* `cd myright`
* `php bin/console app:googlesearch2pdf [search term] [number of total results]`
