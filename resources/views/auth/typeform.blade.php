<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.27.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

 
<style>
button{
    
  padding: 15px 30px;
  background: #000;
  border:0;
  color: #fff;
  text-transform: uppercase;
  font-family: helvetica;
  font-size: 12px;
  letter-spacing: 3px;
  position: relative;
  transition:         all .4s cubic-bezier(0.645, 0.045, 0.355, 1);
  cursor: pointer;
  display: block;

margin-bottom: auto;
}

button::after,
button::before{
  content: "";
  position: absolute;
  top: 50%;
  right: 0px;
  transform: translateY(-50%);
    opacity: 0;
  transition:         all .4s cubic-bezier(0.645, 0.045, 0.355, 1);
}

button::after{
    width: 30px;
    height: 1px;
    background: white;
    transform: translateX(-3px);
    margin-top: 0px;
}

button::before{
    content: "";
    transform: rotate(-135deg) translateX(50%);
    width: 11px;
    height: 11px;
    background: transparent;
    border-left: 1px solid white;
    border-bottom: 1px solid white;
  margin-top: -1px;
}


button:hover{
  padding: 15px 60px 15px 20px;
}

button:hover::after,
button:hover::before{
  opacity: 1;
  right: 15px;
}
</style>
<script>
    window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}

</script>
<body>
    <div class="bg-gradient-to-r from-[#380036] to-[#0cbaba] " >
    <div class="grid w-6/12 bg-transparent place-content-center h-[550px]" id="first">
        <p>1.
            Hello, what's your name?</p>
            <br>
            <input type="text" class="block p-2 rounded w-[310px] border-none outline-none"  placeholder="Name" name="fname" value=""><br>
        <button type="button" onclick="smoothScroll(document.getElementById('second'))">OK!</button>
    </div>
<div class="grid w-6/12 bg-transparent place-content-center h-[550px] " id="second" >
    <p>2.
        Now we need your email:</p>
        <br>
        <input type="email" class="block p-2 rounded w-[310px] border-none outline-none" placeholder="name@example.com" name="fname" value=""><br>
    <button type="button" onclick="smoothScroll(document.getElementById('third'))">OK!</button>
</div>
<div class="grid w-6/12 bg-transparent place-content-center h-[550px]" id="third">
    <p>3.
        Password and confirm password</p>
        <br>
        <input type="password" class="block p-2 rounded w-[310px] border-none outline-none" placeholder="Password" name="fname" value=""><br>
    <button type="button" onclick="smoothScroll(document.getElementById('forth'))">OK!</button>
</div>
<div class="grid w-6/12 bg-transparent place-content-center h-[550px]" id="forth">
    <p>4.
        Company Name</p>
         <br>
         <input type="text" class="block p-2 rounded w-[310px] border-none outline-none" placeholder="Company Name" name="fname" value=""><br>
    <button type="button" onclick="smoothScroll(document.getElementById('fifth'))">OK!</button>
</div>
<div class="grid w-6/12 bg-transparent place-content-center h-[550px]" id="fifth">
    <p>5.
        Candidate Types and Attributes</p>
        <br>
        <select id="language" onChange="update()" class="select select-md w-[310px] max-w-xs">
            <option disabled selected>Select</option>
            <option>Front</option>
            <option>Back</option>
            <option>DevOps</option>
            <option>QA</option>
          </select><br>
          <input id="text" type="text" placeholder="Type here" class="input input-ghost w-full max-w-xs" />
    <button type="button"  onclick="smoothScroll(document.getElementById('first'))">Submit</button>

    
<script type="text/javascript">
    function update() {
        var select = document.getElementById('language');
        var option = select.options[select.selectedIndex];

    
        document.getElementById('text').value = option.text;
    }

    update();

   
</script>
</div>
</body>