## Challenge

Build a micro API that accepts an image that performs at least 3 manipulations that change the composition of the image. This means no resizing or cropping, but rather adding filters and/or text or other compositing that physically alter the image.

## Code structure at a glance

<a href="https://raw.githubusercontent.com/masoudjahromi/SHCC/master/at_a_glance.png"><img src="https://raw.githubusercontent.com/masoudjahromi/SHCC/master/at_a_glance.png" alt="structure at a glance"></a>

## How to test

`docker run -t -p 8080:8080 -e PORT=8080 masoud72/shcc`

POST: `http://127.0.0.1:8080/api/image/upload`

form-data:
    `image(file)` - `operations(json)`

**sample operations field:**

`[{ "type": "text", "value": "just for test" }, { "type": "filter", "value": "dark" }]`
