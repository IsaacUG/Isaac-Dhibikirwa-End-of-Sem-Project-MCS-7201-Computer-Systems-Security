#!/bin/bash

# ZAP Automation Script
# Make sure OWASP ZAP is installed and zap.sh is in PATH

TARGET="http://localhost/vulnerable_app"
REPORT_DIR="../scans/zap"

echo "[*] Starting OWASP ZAP in daemon mode..."
zap.sh -daemon -port 8080 -config api.disablekey=true &
sleep 10

echo "[*] Running spider..."
curl "http://localhost:8080/JSON/spider/action/scan/?url=$TARGET"

sleep 15

echo "[*] Running active scan..."
curl "http://localhost:8080/JSON/ascan/action/scan/?url=$TARGET"

sleep 60

echo "[*] Generating report..."
curl "http://localhost:8080/OTHER/core/other/htmlreport/" -o "$REPORT_DIR/zap_report_auto.html"

echo "[✓] ZAP scan complete. Report saved to $REPORT_DIR"