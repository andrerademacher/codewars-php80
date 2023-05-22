#!/bin/bash

SCRIPT_DIRECTORY="$(dirname -- "$(readlink -f -- "${BASH_SOURCE[0]}")")"
cd "${SCRIPT_DIRECTORY}" || exit

docker build \
  --no-cache \
  --pull \
  --tag "andrerademacher/codewars-php80" \
  .