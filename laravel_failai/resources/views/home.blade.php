<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<h1>Sveiki atvyke į home puslapį</h1>

<br>
<br>


<div id="top_produktai"> </div>
<script>
    $(document).ready(function () {
        $.ajax({
            url: "/api/top_produktai",
            type: "GET",
            success: function (data) {
                let produktai = data.data;
                let produktuHtml = '';
                for (let i = 0; i < produktai.length; i++) {
                    let produktas = produktai[i];
                    produktuHtml += `
                    <div class="flex flex-col justify-between items-center">
                        <div class="flex justify-center items-center">
                            <img src="${produktas.image}" alt="product" class="w-40 h-40">
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <p class="font-medium text-base leading-4 text-gray-800 dark:text-white">${produktas.name}</p>
                            <p class="font-normal text-sm leading-3 text-gray-600 dark:text-gray-300">${produktas.price} €</p>
                        </div>
                    </div>
                `;
                }
                $('#top_produktai').html(produktuHtml);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

</script>
@csrf
