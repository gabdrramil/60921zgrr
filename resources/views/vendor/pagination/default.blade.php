<style>
    .pagination-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 1.5rem;
        padding: 1rem 1.25rem;
        background-color: #f8f9fa;
        border-radius: 0.5rem;
    }

    .pagination-wrapper {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: space-between;
        gap: 1.5rem;
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        margin: 0;
        gap: 0.5rem;
    }

    .page-item:first-child .page-link {
        border-top-left-radius: 0.375rem;
        border-bottom-left-radius: 0.375rem;
    }

    .page-item:last-child .page-link {
        border-top-right-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
    }

    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.875rem;
        line-height: 1.25;
        color: #0d6efd;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: all 0.2s ease;
        min-width: 2.5rem;
        text-align: center;
    }

    .page-link:hover {
        z-index: 2;
        color: #0a58ca;
        background-color: #e9ecef;
        border-color: #dee2e6;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
        font-weight: 500;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
        opacity: 0.7;
    }

    .per-page-selector {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .per-page-label {
        font-size: 0.9375rem;
        color: #495057;
        white-space: nowrap;
    }

    .per-page-form {
        margin: 0;
        min-width: 6rem;
    }

    .form-select {
        padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        font-size: 0.9375rem;
        border-radius: 0.375rem;
        border: 1px solid #ced4da;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        width: 100%;
    }

    .form-select:focus {
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    @media (max-width: 768px) {
        .pagination-wrapper {
            flex-direction: column;
            gap: 1.25rem;
        }

        .per-page-selector {
            width: 100%;
            justify-content: space-between;
        }

        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
</style>
@if ($paginator->hasPages())
    <div class="pagination-container">
        <div class="pagination-wrapper">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>

            <div class="per-page-selector">
                <span class="per-page-label">Элементов на странице:</span>
                <form method="get" action="{{url('user')}}" class="per-page-form">
                    <select name="perPage" class="form-select" onchange="this.form.submit()">
                        <option value="5" @if($paginator->perPage() == 5) selected @endif>5</option>
                        <option value="10" @if($paginator->perPage() == 10) selected @endif>10</option>
                        <option value="20" @if($paginator->perPage() == 20) selected @endif>20</option>
                        <option value="50" @if($paginator->perPage() == 50) selected @endif>50</option>
                        <option value="100" @if($paginator->perPage() == 100) selected @endif>100</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
@endif
