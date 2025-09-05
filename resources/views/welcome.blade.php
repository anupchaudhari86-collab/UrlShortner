<!DOCTYPE html>
<html lang="en">
<head>
  <title>URL Shortner</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
               <div class="card-header text-center">
                <h3>URL Shortner</h3>
               </div>

  
    <div class="card-body">
    <form id="shortner-form">
        <div class="mb-3">
        <label for="original_url" class="form-label">Enter URL to shorten</label>
        <input type="url" class="form-control" id="original_url" placeholder="https://example.com" name="original_url" required>
        </div>
        <button type="submit" class="btn btn-primary w-100" style="margin-top:10px;">Shorten URL</button>
    </form>

    <div class="mt-3" id="result" style="display:none;">
        <h5>Shortened URL:</h5>
        <a href="#" target="_blank" id="short_url" class="btn btn-link"></a>
            </div>
        </div>
       </div> 
      </div>
     </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script>
 document.getElementById('shortner-form').addEventListener('submit', function(event) {

     event.preventDefault();
     const originalUrl = document.getElementById('original_url').value;
     fetch('{{route('url.short')}}', {
         method: 'POST',
         headers: {
             'Content-Type': 'application/json',
             'Accept': 'application/json',
             'X-CSRF-TOKEN': '{{ csrf_token() }}'
         },
         body: JSON.stringify({ original_url: originalUrl })
     })

     .then(response => response.json())
     .then(data => {
         const shortUrlElement = document.getElementById('short_url');
         shortUrlElement.href = data.short_url;
         shortUrlElement.textContent = data.short_url;
         document.getElementById('result').style.display = 'block';
     })
     .catch(rror => console.error('Error:', error));

 });   
</script>    

</body>
</html>