## Employee Module
>> In this module I practiced to generate module from terminal via command `'lando drush generate module'`. Then build an employee form which takes employee data, form validation and then the data added to the database.

**How the module is built**

>> Created
```bash
lando drush generate module
```

>> Cache cleared
```bash
lando drush cr
```

>> Module installed
```bash
lando drush en employee
```

>> It can be uninstalled, if needs be:
```bash
lando drush un employee
```

>> Form generated
```bash
lando drush generate form
```

### After the module is created; form validation feature added!

>> Each input of the form have gotten functions added to it.


### Then employee.install directory added:

>> Database feature of the project:

```bash
lando drush generate install-file
```
