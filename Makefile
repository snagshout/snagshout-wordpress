changelog:
	/bin/bash -c "docker run -v $(shell pwd)/.git:/.git quay.io/etcinit/shift:v0.0.0.4 generate -t git > CHANGELOG.md"
