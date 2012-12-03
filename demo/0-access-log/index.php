<pre><?php
echo "Last collected: "; passthru('tail -n1 '.dirname(__FILE__).'/../collect.txt');
echo "\n";
passthru('grep -v "0-" /var/log/apache2/access.log|tail -n4|tac|awk \'{print $7" from "$11}\'');
?></pre>
<script>
setTimeout( function() { location.reload() }, 1000 );
</script>
