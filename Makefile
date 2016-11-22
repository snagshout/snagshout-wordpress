changelog:
	/bin/bash -c "docker run -v $(shell pwd)/.git:/.git quay.io/etcinit/shift:v0.0.0.4 generate -t git > CHANGELOG.md"
	git add CHANGELOG.md
	git commit -m "chore(CHANGELOG): Update CHANGELOG"

dist:
	rm -rf dist
	mkdir dist
	cp -R src/* dist
	cp LICENSE dist
	cp CHANGELOG.md dist
	zip -r snagshout-wordpress.zip dist

upload: dist
	svn co https://plugins.svn.wordpress.org/snagshout remote
	cp -R dist/* remote/trunk
	cd remote \
		&& svn add --force trunk/* \
		&& svn ci -m 'Release. See github.com/sellerlabs/snagshout-wordpress.' \
		--username snagshout

checkout:
	svn co https://plugins.svn.wordpress.org/snagshout remote

clean:
	rm -rf dist
	rm -rf remote
	rm -rf snagshout-wordpress.zip
