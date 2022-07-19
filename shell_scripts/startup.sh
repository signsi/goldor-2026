docker-compose up -d wordpress db
echo "Warte auf den Start der Wordpress-Installation."
sleep 10;
docker-compose run wpcli wp core install --url=localhost:8007 --title="RocketPager" --admin_name=admin --admin_password=admin --admin_email=psiegfried@rocket.ch --skip-email
docker-compose run wpcli wp option set blog_public 0