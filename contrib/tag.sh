#!/bin/bash

echo "Please enter the new version tag in the X.X.X format: "
read new_tag

sed -e "s/Stable tag: [0-9]*\\.[0-9]*\\.[0-9]*/Stable tags: ${new_tag}/" \
  src/readme.txt > src/readme.txt
sed -e "s/@version [0-9]*\\.[0-9]*\\.[0-9]*/@version ${new_tag}/" \
  src/snagshout.php > src/snagshout.php
sed -e "s/Version: [0-9]*\\.[0-9]*\\.[0-9]*/Version: ${new_tag}/" \
  src/snagshout.php > src/snagshout.php

git add src/readme.txt src/snagshout.php
git commit -m "chore(readme.txt): Bump version to ${new_tag}"

git tag "v${new_tag}"

git push
git push --tags

make clean
make upload

cd remote

svn cp trunk "tags/${new_tag}"
svn ci -m "Tagging version ${new_tag}"

cd ..

make clean
