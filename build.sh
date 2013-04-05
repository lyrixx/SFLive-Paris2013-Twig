#!/bin/sh

pandoc --section-divs -t html5 -s --template template.revealjs -o index.html slides.md
