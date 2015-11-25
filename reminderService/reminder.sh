#path to php
#!/opt/bitnami/php/bin/php
#run reminder.php every day at midnight
# crontab -e
00 00 * * * /opt/bitnami/php/bin/php /opt/bitnami/apache2/reminder/reminder.php