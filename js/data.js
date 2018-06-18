
const data = 'https://flauntsites.local/wp-json/wp/v2/seoqa'
const main = document.querySelector('.entry-content')
const div = document.createElement('div')
const title = document.createElement('h1')
const jsonLd = document.createElement('script')
const schema = [{ "title": "This is the title" }]

console.log(schema)

const posts = function () {
    fetch(data)
        .then(
            function (response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }

                // Examine the text in the response
                response.json().then(function (data) {

                    console.log(data)

                    main.appendChild(div)
                    div.appendChild(title)
                    main.appendChild(jsonLd)

                    jsonLd.innerText = JSON.stringify(schema);

                    title.innerHTML = data[0].title.rendered
                    schema.push({ "content": "This is content" })


                    div.innerHTML = data[0].content.rendered

                });
            }
        )
        .catch(function (err) {
            console.log('Fetch Error :-S', err);
        });
}
posts()
