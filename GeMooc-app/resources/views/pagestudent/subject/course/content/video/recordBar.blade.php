{{-- {{ dd('a') }} --}}

<ul class="navProgress" onclick="" id="navProgress"></ul>

@php
    for ($i=0; $i < ; $i++) {

    }
@endphp

<script>
    for (let i = 0; i < bufferLength; i++) {
        var second = parseInt(i % 60);
        var minute = parseInt(i / 60);
        (second < 10) ? second = '0' + second: second;
        (minute < 10) ? minute = '0' + minute: minute;
        var newLi = document.createElement('div');
        newLi.className = 'recordSlot';
        newLi.style.width = (videoWidth) / bufferLength + 'px';
        newLi.setAttribute('at_record', i);
        newLi.setAttribute('status', 'undefind');
        newLi.setAttribute('data-toggle', 'tooltip');
        newLi.setAttribute('data-placement', 'bottom');
        newLi.setAttribute('title', minute + ':' + second);
        newLi.onclick = function () {
            // console.log('currentTime: ' + i);
            player.currentTime = i;
            click = true;
        }
        // console.log('object :' + ($(videoIdSharp).width()));
        document.getElementById('navProgress').appendChild(newLi);
    }
</script>
