#!/bin/sh

su -p oracle -c" sqlplus ORACLE/ORACLE as SYSDBA <<EOF
alter profile "DEFAULT" limit password_life_time unlimited;
alter profile "DEFAULT" limit password_grace_time 14;
alter user ORACLE identified by ORACLE;
alter profile "DEFAULT" limit password_reuse_max 10 password_reuse_time 365;
EOF"
