#!/usr/bin/env sh
SRC_DIR="`pwd`"
cd "`dirname "$0"`"
cd "../vendor/apigen/apigen"
BIN_TARGET="`pwd`/apigen.php"
cd "$SRC_DIR"
"$BIN_TARGET" "$@"
