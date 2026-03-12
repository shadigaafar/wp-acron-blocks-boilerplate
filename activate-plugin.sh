#!/bin/bash
# Wait for MySQL to be ready
echo "Waiting for MySQL..."
until wp db check --allow-root; do
  sleep 2
done

# Activate the plugin
wp plugin activate acorn-block --allow-root
echo "Plugin acorn-block activated!"