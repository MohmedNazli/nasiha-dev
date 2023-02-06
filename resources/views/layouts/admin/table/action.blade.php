@php
    $childId ??= null
@endphp

<td>
    <div class="d-flex align-items-center">
        @if (isset($customActions) && $customActions)
            @foreach ($customActions as $customAction)
            @if ($customAction)
                @if ($customAction['modal'])
                    <a href="{{ $customAction['route'] }}"
                        data-bs-toggle="modal" data-bs-target="{{ $customAction['id'] }}" class="px-2 me-2 btn btn-sm btn-{{ $customAction['color'] }} d-flex align-items-center">
                        <span class="me-1">{{ $customAction['buttonText'] }}</span>
                        <i class="fa fa-{{ $customAction['icon'] }} fa-fw"></i>
                    </a>
                @elseif(isset($customAction['link']) && $customAction['link'])
                    <a href="{{ $customAction['route'] }}" class="px-2 me-2 btn btn-sm btn-{{ $customAction['color'] }} d-flex align-items-center">
                        <span class="me-1">{{ $customAction['buttonText'] }}</span>
                        <i class="fa fa-{{ $customAction['icon'] }} fa-fw"></i>
                    </a>
                @elseif(isset($customAction['dropdown']) && $customAction['dropdown'])
                    <div class="dropdown">
                        <button class="px-2 me-2 btn btn-sm btn-{{ $customAction['color'] }} d-flex align-items-center dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $customAction['buttonText'] }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($customAction['links'] as $link)
                                <li>
                                    <a href='{{ $link["route"] }}' class="dropdown-item w-100 btn btn-sm btn-light btn-active-light-primary">
                                        {{ $link["text"] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>                
                @else
                    <form method="POST" action="{{ $customAction['route'] }}" class="px-2 me-2 btn btn-sm btn-warning d-flex align-items-center"
                        onclick="doAction(event, '{{ $customAction['buttonText'] }}', true, '{{ $customAction['message'] }}')">
                        @csrf
                        <span class="me-1">{{ $customAction['buttonText'] }}</span>
                        <i class="fa fa-{{ $customAction['icon'] }} fa-fw"></i>
                    </form>
                @endif
            @endif
            @endforeach
        @endif
        @isset ($showChildRoute)
            <a href="{{ $showChildRoute }}" class="px-2 me-2 btn btn-sm btn-primary d-flex align-items-center">
                <span class="me-1">{{ __('main.details') }}</span>
                <i class="fa fa-plus fa-fw"></i>
            </a>
        @endisset
        @isset ($editRoute)
            <a href="{{ $editRoute }}" class="px-2 me-2 btn btn-sm btn-success d-flex align-items-center">
                <span class="me-1">{{ __('main.edit') }}</span>
                <i class="fa fa-edit fa-fw"></i>
            </a>
        @endisset
        @isset ($updateRoute)
            <a href="{{ $updateRoute }}"
                data-bs-toggle="modal"data-bs-target="#kt_modal_edit{{ $childId }}" class="px-2 me-2 btn btn-sm btn-success d-flex align-items-center">
                <span class="me-1">{{ __('main.edit') }}</span>
                <i class="fa fa-edit fa-fw"></i>
            </a>
        @endisset
        @isset ($destroyRoute)
            <form method="POST" action="{{ $destroyRoute }}"
                class="px-2 me-2 btn btn-sm btn-danger d-flex align-items-center" data-kt-table-filter="delete_row">
                @csrf @method('DELETE')
                <span class="me-1">{{ __('main.delete') }}</span>
                <i class="fa fa-trash fa-fw"></i>
            </form>
        @endisset
    </div>
</td>