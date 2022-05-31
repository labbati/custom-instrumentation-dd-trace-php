Build the test image

```
docker build -t php-dd-apm .
```

Run the example

```
docker run --rm -ti -p 8080:8080 -v $(pwd):/var/www/html --name php-dd-apm php-dd-apm
```
