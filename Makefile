changelog:
	/bin/bash -c "docker run -v $(shell pwd)/.git:/.git quay.io/etcinit/shift:v0.0.0.4 generate -t git > CHANGELOG.md"

dist:
	rm -rf dist
	mkdir dist
	cp -R src/ dist
	cp LICENSE dist
	cp CHANGELOG.md dist
	zip -r snagshout-wordpress.zip dist

clean:
	rm -rf dist
