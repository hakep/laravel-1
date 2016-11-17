<aside id="aside">
    <ul>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder-open"></i><span>Файлы </span></a>
            <ul class="dropdown-menu">
                @foreach ($templateList as $template)
                    <li><a href="{{ route('file', $template) }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span>{{ $template }}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('pages.index') }}"><i class="fa fa-file-code-o" aria-hidden="true"></i> <span>Страницы</span></a></li>
    </ul>
    <a href="http://mk-plus.ru/" title="first@xakep.ru" target="_blank" class="copyright">MK-PLUS</a>
</aside>