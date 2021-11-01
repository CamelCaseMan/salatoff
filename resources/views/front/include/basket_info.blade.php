<div class="-composition">
    @if(isset($product->getAttributeProduct->composition) ||isset($product->getAttributeProduct->energy)||isset($product->getAttributeProduct->implementation_period))
        <div class="-trigger">
            Состав
            <svg class="-icon" width="19" height="20" viewBox="0 0 19 20" fill="none">
                <g clip-path="url(#clip0_95:9)">
                    <path d="M9.625 1.5C4.86203 1.5 1 5.36203 1 10.125C1 14.888 4.86203 18.75 9.625 18.75C14.388 18.75 18.25 14.888 18.25 10.125C18.25 5.36203 14.388 1.5 9.625 1.5Z"
                          stroke="#828282" stroke-miterlimit="10"/>
                    <path d="M8.3125 8.8125H9.8125V14.25" stroke="#828282"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7.75 14.4375H11.875" stroke="#828282" stroke-miterlimit="10"
                          stroke-linecap="round"/>
                    <path d="M9.625 4.59375C9.38396 4.59375 9.14832 4.66523 8.9479 4.79915C8.74748 4.93307 8.59127 5.12341 8.49902 5.34611C8.40678 5.56881 8.38264 5.81386 8.42967 6.05027C8.47669 6.28669 8.59277 6.50385 8.76321 6.67429C8.93366 6.84474 9.15082 6.96081 9.38724 7.00784C9.62365 7.05486 9.8687 7.03073 10.0914 6.93849C10.3141 6.84624 10.5044 6.69003 10.6384 6.48961C10.7723 6.28918 10.8438 6.05355 10.8438 5.8125C10.8438 5.48927 10.7154 5.17928 10.4868 4.95071C10.2582 4.72215 9.94824 4.59375 9.625 4.59375Z"
                          fill="#828282"/>
                </g>
                <defs>
                    <clipPath id="clip0_95:9">
                        <rect width="19" height="19" fill="white"
                              transform="translate(0 0.5)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
    @endif
    <div class="-hidden-info">
        <div class="-body">
            @if(isset($product->getAttributeProduct->composition))
                <p>
                    <b>Состав:</b> {{$product->getAttributeProduct->composition}}
                </p>
            @endif
            @if(isset($product->getAttributeProduct->energy))
                <p>
                    <b>Энергетическая ценность на 100 г:</b><br>
                    {{$product->getAttributeProduct->energy}}
                </p>
            @endif
            @if(isset($product->getAttributeProduct->implementation_period))
                <p>
                    <b>Срок реализации</b><br>
                    {{$product->getAttributeProduct->implementation_period}}
                </p>
            @endif
        </div>
        <svg class="-angle" width="29" height="10" viewBox="0 0 29 10" fill="none">
            <path d="M13.5201 9.70876L6.01196 2.32994C4.49944 0.843479 2.38567 -2.09686e-06 0.173096 0H28.3269C26.1143 0 24.0005 0.843481 22.488 2.32994L14.9798 9.70876C14.5847 10.0971 13.9153 10.0971 13.5201 9.70876Z"
                  fill="#3A3A3A"/>
        </svg>
    </div>
</div>