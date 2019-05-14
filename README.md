# PolicyInfo-WebApp
The PHP Project revolves around retrieving policy holder and vehicle information through Phone or Policy Number. Database referenced here are proprietary to a existing Insurance Company with sample records .  Phone Number/Policy Number Is Passed As A PHP Argument During Code Execution.

### Via Phone Number 

The Policy Information Is Retrieved Through Policy Holder's Phone Number.
* Phone Number Is Passed As A PHP Argument During Code Execution. **`'$phone = $argv[1]'`**.
* DB Referenced : **`OPS$OPUS.VW_NS_POLICY_INFO`** & **`OPS$OPUS.VW_NS_POLICY_VEH_INFO`**.
```php
[pa167@webapps7-dev phone]$ php phone.php 4435292128
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
