software-vulnerability-analysis/
│
├── README.md
├── LICENSE
├── .gitignore
│
├── docs/
│   ├── report.pdf
│   ├── screenshots/
│   │   ├── screenshot1_setup.png
│   │   ├── screenshot2_zap_scan_before.png
│   │   ├── screenshot3_sql_injection.png
│   │   ├── screenshot4_xss.png
│   │   ├── screenshot5_path_traversal.png
│   │   ├── screenshot6_nessus_scan.png
│   │   ├── screenshot7_fix_sql.png
│   │   ├── screenshot8_fix_xss.png
│   │   ├── screenshot9_after_fix_results.png
│   │   └── screenshot10_zap_after_fix.png
│   │
│   └── diagrams/
│       ├── architecture.png
│       └── workflow.png
│
├── app/
│   ├── original/              # Unmodified vulnerable app
│   │   ├── index.php
│   │   ├── login.php
│   │   └── ...
│   │
│   └── patched/              # Your fixed version
│       ├── index.php
│       ├── login.php
│       ├── secure_config.php
│       └── ...
│
├── fixes/
│   ├── sql_injection_fix.php
│   ├── xss_fix.php
│   ├── path_traversal_fix.php
│   ├── csrf_protection.php
│   ├── input_validation.php
│   └── security_headers.php
│
├── scans/
│   ├── zap/
│   │   ├── zap_report_before.html
│   │   ├── zap_report_after.html
│   │
│   ├── nessus/
│   │   ├── nessus_report_before.pdf
│   │   ├── nessus_report_after.pdf
│   │
│   └── raw_logs/
│       ├── zap_output.txt
│       └── nessus_output.txt
│
├── scripts/
│   ├── zap_automation.sh
│   ├── test_payloads.txt
│   └── setup_env.sh
│
├── results/
│   ├── before_fix_summary.md
│   ├── after_fix_summary.md
│   └── comparison_table.md
│
└── references/
    ├── tools_used.md
    └── resources.md