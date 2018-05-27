{extends 'template.tpl'}
{block 'page_content'}
  <div class="row">
    <div class="col-12 text-center">
      <h2 class="h2 text-danger">ERROR</h2>
    </div>
  </div>
  <div class="row text-center">
    {if !!msg}
      <h1 class="w-100 text-dark"><strong>:(<br>{$msg}</strong></h1>
    {else}
      <h1 class="w-100 text-dark"><strong>:(<br>Something is wrong</strong></h1>
    {/if}
  </div>
{/block}