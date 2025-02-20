<nav class="c-menu">
  @if($menuParents->isNotEmpty())
  <div class="is-first-col">
    <ul class="c-menu__list">
      @foreach($menuParents as $parent)
        @php
          $parentId = (string) $parent->db_id;
          $hasChild = $menuChildren->has($parentId);
        @endphp
        <li class="c-menu__item {{ $hasChild ? 'has-child' : '' }}" data-has-child="{{ $parentId }}">
          <a href="{{ $parent->url }}">{{ $parent->title }}</a>
          @if($hasChild)
            <svg width="6px" height="11px">
              <use xlink:href="#arrow-icon"></use>
            </svg>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
  @endif

  @if($menuChildren->isNotEmpty())
    <div class="is-second-col">
      @foreach($menuChildren as $parentId => $childItems)
        <ul class="c-menu__child" data-id="{{ $parentId }}">
          @foreach($childItems as $child)
            <li class="c-menu__item">
              <a href="{{ $child->url }}">{{ $child->title }}</a>
            </li>
          @endforeach
        </ul>
      @endforeach
    </div>
  @endif

  @if($menuImage)
    <div class="is-third-col">
      <img src="{!! $menuImage !!}" alt="">
    </div>
  @endif
</nav>
