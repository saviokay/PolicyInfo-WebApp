# PolicyInfo-WebApp
![Issues](https://img.shields.io/github/issues/saviokay/PolicyInfo-WebApp.svg?style=popout)
![Forks](https://img.shields.io/github/forks/saviokay/PolicyInfo-WebApp.svg?style=popout)
![License](https://img.shields.io/github/license/saviokay/PolicyInfo-WebApp.svg?logo=MIT&style=popout)


The PHP Project revolves around retrieving policy holder and vehicle information through Phone or Policy Number.
Database referenced here are proprietary to a existing Insurance Company with sample records .
Phone Number/Policy Number Is Passed As A PHP Argument During Code Execution.

## Requirements

Additional PHP packages are used to help to connect to an Oracle Database. 
Alternative interpreters compatible with 2.0+ should work as well.

Earlier PHP versions are also supported. 
These versions have official support and receive security updates.

The rest-api application depends on these other gems for usage at runtime:

* [oci_connect](https://www.php.net/manual/en/function.oci-connect.php)
* [oci_parse](https://www.php.net/manual/en/function.oci-parse.php)
* [oci_bind_by_name](https://www.php.net/manual/en/function.oci-bind-by-name.php)
* [oci_error](https://www.php.net/manual/en/function.oci-error.php)

## Usage


### Via Phone Number 

The Policy Information Is Retrieved Through Policy Holder's Phone Number.
* Phone Number Is Passed As A PHP Argument During Code Execution. **`'$phone = $argv[1]'`**.
* DB Referenced : **`OPS$OPUS.VW_NS_POLICY_INFO`** & **`OPS$OPUS.VW_NS_POLICY_VEH_INFO`**.
```php
[username@webapps7-dev phone]$ php phone.php 4435292128
Information For Policy#ID With Phone Number: 4435292128
[
    {
         "POLICYNUMBER": "JF80331",
         "EFFECTIVEDATE": "06\/27\/2018",
         "EXPIRATIONDATE": "06\/27\/2019",
         "PRODUCERCODE": "11977",
         "PRODUCT": "131",
         "PLANCODE": "B1",
         "FIRSTNAME": "SIERRA",
         "LASTNAME": "DARGAN",
         "ADDRESS": "6718 QUIET HOURS",
         "CITY": "COLUMBIA",
         "STATE": "MD",
         "ZIP": "21045-4956",
         "PHONE": "4435292128",
         "EMAIL": null,
         "POLICY_ID": "JF80331"
    }
]
[
    {
         "YEAR": "2005",
         "MAKE": "HYUN",
         "MODEL": "ACCENT",
         "VIN": "KMHCG35C15U338533",
         "POLICY_ID": "JF80331"
    }
]
```

### Via Policy Number 

The Policy Information Is Retrieved Through Policy Holder's Policy Number.

* Policy Number Is Passed As A PHP Argument During Code Execution. **`'$id = $argv[1]'`**.
* DB Referenced : **`OPS$OPUS.VW_NS_POLICY_INFO`** & **`OPS$OPUS.VW_NS_POLICY_VEH_INFO`**.

```php
[username@webapps7-dev policy]$ php policy.php JF80331
Information For Policy#ID: JF80331

[
    {
        "POLICYNUMBER": "JF80331",
        "EFFECTIVEDATE": "06\/27\/2018",
        "EXPIRATIONDATE": "06\/27\/2019",
        "PRODUCERCODE": "11977",
        "PRODUCT": "131",
        "PLANCODE": "B1",
        "FIRSTNAME": "SIERRA",
        "LASTNAME": "DARGAN",
        "ADDRESS": "6718 QUIET HOURS",
        "CITY": "COLUMBIA",
        "STATE": "MD",
        "ZIP": "21045-4956",
        "PHONE": "4435292128",
        "EMAIL": null,
        "POLICY_ID": "JF80331"
    }
]
[
    {
        "YEAR": "2005",
        "MAKE": "HYUN",
        "MODEL": "ACCENT",
        "VIN": "KMHCG35C15U338533",
        "POLICY_ID": "JF80331"
    }
]
```
## Legal

Released under the MIT License: https://opensource.org/licenses/MIT

Images used and considered are in the public domain.
