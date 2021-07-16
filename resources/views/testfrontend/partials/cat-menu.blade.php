<div class="navbar">
    <a href="javascript:void(0)" onclick="openNav()">
        <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
        </div>
    </a>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
        <nav>
            <div onclick="closeNav()">
                <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back</div>
            </div>
            <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                @foreach (\App\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key =>
                $category)
                <li> <a
                        href="{{ route('allproducts.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a>

                    @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                    <ul>
                        @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($category->id) as $key =>
                        $first_level_id)
                        <li> <a
                                href="{{ route('allproducts.category', \App\Category::find($first_level_id)->slug) }}">{{ \App\Category::find($first_level_id)->getTranslation('name') }}</a>
                            @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id))>0)
                            <ul>
                                @foreach (\App\Utility\CategoryUtility::get_immediate_children_ids($first_level_id) as
                                $key => $second_level_id)
                                <li>
                                    <a
                                        href="{{ route('allproducts.category', \App\Category::find($second_level_id)->slug) }}">{{ \App\Category::find($second_level_id)->getTranslation('name') }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

            </ul>
        </nav>
    </div>
</div>