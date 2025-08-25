#!/bin/bash

# Define the name of the zip file
ZIP_FILE="../cube-wp.zip"

# Remove existing zip file if it exists
if [ -f "$ZIP_FILE" ]; then
    rm "$ZIP_FILE"
fi

# Create the zip archive, excluding package-lock.json and node_modules
zip -r "$ZIP_FILE" . -x "node_modules/*" "package-lock.json"

echo "Archive created: $ZIP_FILE"
