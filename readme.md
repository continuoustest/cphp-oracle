# CPHP Oracle

Test Behat for Oracle additional container called by workers 

## Getting Started

These instructions will get you running on your local machine for development and testing purposes. 

### Prerequisites

You need to access to the cphp oracle container
 
### Installing


#### Running Oracle image

```
docker run -itd --shm-size 1G -p 1521:1521 <imageID>
```

#### Configuring Oracle (Client & Server) :

While the oracle container is running : 
```
"downloading client librairies"
pecl install oci8
(sudo) /bin/bash -c "echo '127.0.0.1 $(hostname)' >> /etc/hosts"
php sql_init.php
```

#### Configuring Behat on the local environment :
* Installing Behat:
```
composer update
```
* Verifying Behat:
```
vendor/bin/behat -V
```
