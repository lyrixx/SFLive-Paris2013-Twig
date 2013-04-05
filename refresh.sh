#!/bin/bash

# apt-get install inotify-tools

BASE_PATH=`dirname $0`

while true
  do
    inotifywait -e modify -e move -e create -e delete slides.md | while read line
      do
        $BASE_PATH/build.sh
      done
  done
