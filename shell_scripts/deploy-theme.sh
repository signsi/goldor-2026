echo "sync theme"
cd /var/www/html/wp-content/themes/${THEME_FOLDER}
git config --global --add safe.directory '*'
git checkout main
git pull origin main


echo "sync public folder"
# rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete themes/$THEME_FOLDER/public/* $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/themes/$THEME_FOLDER/public

rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete public/* $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/themes/$THEME_FOLDER/public