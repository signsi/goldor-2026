echo "sync theme"
cd /var/www/html/wp-content/themes/${THEME_FOLDER}
yarn build
git config --global --add safe.directory '*'
git checkout main
git pull origin main


echo "sync public folder"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $THEME_ROOT; git pull origin main;"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --delete public/* $SSH_USER@$SSH_HOST:$WEB_ROOT/wp-content/themes/$THEME_FOLDER/public