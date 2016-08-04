<ol class="breadcrumb">
    @foreach ($breadcrumbs as $title => $url)
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" href="{{ route($url) }}">
            <span itemprop="title">{{ $title }}</span>
        </a>
    </li>
    @endforeach
</ol>