<form role="search" method="get" class="c-search" action="{{ home_url('/') }}">
  <input 
    type="search" 
    class="c-input" 
    placeholder="{!! esc_attr_x('Search for a product', 'placeholder', 'sage') !!}" 
    name="s"
    value="{{ get_search_query() }}"
  >
</form>