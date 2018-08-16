# BWB-Sales-Contact
Object Oriented PHP and jQuery application built for the WordPress environment.

## Author
- [Zach Smith](https://twitter.com/zachisit)

## Package
`bwb-contact`

## Database Logic
The following tables are required:

#### wp_bwb_contact_submissions
| Column Name  | Type  |
|---|---|
| pageID   | varchar(255)  |
| formType   | varchar(255)  |
| name   | varchar(255)  |
| businessName    | varchar(999)  |
| email   | varchar(255)  |
| phone   | varchar(255)  |
| learnAboutOptions   | varchar(255)  |
| ip   | varchar(255)  |
| timeStamp   | timestamp   |

## Dependencies
* jQuery

## Shortcodes Used
* Contact Form - `bwbMarketingContactForm`
* Thank You Template - `marketingThankYou`

## WordPress Version
* At time of last update, this theme was built and tested with WordPress version 4.9.7.