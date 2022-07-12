# read .env

if [ ! -f ../.env ]
then
export $(cat .env | xargs)
fi

# connection to server, to delete the existing version

echo $SSH_PORT
echo $SSH_USER
echo $SSH_PORT
echo $WEB_ROOT

echo "building website"
yarn build
echo "done"

echo "deleting existing website"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "rm -rf $WEB_ROOT*"
echo "done"


#echo "mirror public folder"
rsync -arvz -e "ssh -p $SSH_PORT" --progress --filter=':- .ftpignore' --delete . $SSH_USER@$SSH_HOST:$WEB_ROOT

echo "composer install"
ssh -p $SSH_PORT $SSH_USER@$SSH_HOST "cd $WEB_ROOT && composer install"
echo "done"