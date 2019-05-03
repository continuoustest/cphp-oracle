FROM 310957825501.dkr.ecr.us-east-1.amazonaws.com/oracle

RUN lsnrctl start

COPY ./updatePassword.sh .

RUN chmod +x updatePassword.sh

CMD ["./u01/app/oracle/runOracle.sh"]
