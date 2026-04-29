# Vulnerability Comparison Table

| Vulnerability       | Before Fix | After Fix   | Mitigation Applied  |
|---------------------|------------|-------------|---------------------|
| SQL Injection       | High       | None        | Prepared Statements |
| XSS                 | Medium     | None        | Output Encoding     |
| CSRF                | Present    | Fixed       | CSRF Token          |
| Security Headers    | Missing    | Implemented | HTTP Headers        |
| Input Validation    | Weak       | Strong      | Sanitization        |

## Tool Comparison

| Tool        | Type     | Strength                     | Weakness                 |
|-------------|----------|-----------------------------|---------------------------|
| ZAP         | Dynamic  | Detects runtime issues       | Slower scans             |
| Nessus      | Network  | Broad vulnerability coverage | Less web-specific        |
| Manual      | Static   | Deep code analysis           | Time-consuming           |