## Streams CLI


```bash
php artisan streams:make {blueprint} --input="parsed_str"  --json="json_decoded"
php artisan streams:run {workflow} --input="parsed_str"  --json="json_decoded"

php artisan entries:create {stream} --input="parsed_str"  --json="json_decoded"
php artisan entries:update {stream} {entry} --input="parsed_str"  --json="json_decoded"
```
