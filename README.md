# PHP JSON-G

The usage of the api is extremely simple, there are two endpoints at the moment

Both involve _POST_ing the url of the api, with the variable `in`

The script decides on it's own what to do : 

if `in` is already an instance of json-g, it will be converted to a png

if `in` is a base64 image, it will be converted to json-g
