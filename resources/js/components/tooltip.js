document.addEventListener('DOMContentLoaded', function() {
    // Create tooltip element
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip';
    document.body.appendChild(tooltip);

    // Track current active tooltip element
    let currentTooltipElement = null;

    // Function to update tooltip position and content
    function showTooltip(element, content, position = 'bottom') {
        // Set tooltip content
        tooltip.textContent = content;

        // Position tooltip
        const rect = element.getBoundingClientRect();
        let top, left;

        switch (position) {
            case 'top':
                left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2);
                top = rect.top - tooltip.offsetHeight - 10 + window.scrollY;
                break;
            case 'left':
                left = rect.left - tooltip.offsetWidth - 10;
                top = rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2) + window.scrollY;
                break;
            case 'right':
                left = rect.right + 10;
                top = rect.top + (rect.height / 2) - (tooltip.offsetHeight / 2) + window.scrollY;
                break;
            case 'bottom':
            default:
                left = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2);
                top = rect.bottom + 10 + window.scrollY;
                break;
        }

        tooltip.style.left = left + 'px';
        tooltip.style.top = top + 'px';

        // Make tooltip visible
        tooltip.classList.add('visible');
        currentTooltipElement = element;

        // Add active class to the element
        element.classList.add('tooltip-active');
    }

    // Function to hide tooltip
    function hideTooltip() {
        tooltip.classList.remove('visible');

        // Remove active class from the current element if it exists
        if (currentTooltipElement) {
            currentTooltipElement.classList.remove('tooltip-active');
            currentTooltipElement = null;
        }
    }

    // Add tooltips to service elements
    const serviceElements = document.querySelectorAll('.plan__service');
    serviceElements.forEach(service => {
        service.addEventListener('click', function(e) {
            // Get description from data attribute
            const serviceDesc = service.dataset.desc;

            // If no description or this element already has an active tooltip, hide it
            if (!serviceDesc || currentTooltipElement === service) {
                hideTooltip();
                return;
            }

            // Hide any existing tooltip
            hideTooltip();

            // Show tooltip for this element
            showTooltip(service, serviceDesc);

            // Prevent event from bubbling up to document
            e.stopPropagation();
        });
    });

    // Add tooltips to plan title elements that show plan description
    const planTitles = document.querySelectorAll('.plan__header-title');
    planTitles.forEach(title => {
        title.addEventListener('click', function(e) {
            // Find the description element (sibling of the title)
            const descElement = title.parentElement.querySelector('.plan__header-desc');

            if (!descElement) return;

            const planDesc = descElement.textContent;

            // If this element already has an active tooltip, hide it
            if (currentTooltipElement === title) {
                hideTooltip();
                return;
            }

            // Hide any existing tooltip
            hideTooltip();

            // Show tooltip for this element with plan description
            showTooltip(title, planDesc);

            // Prevent event from bubbling up to document
            e.stopPropagation();
        });
    });

    document.addEventListener('scroll', () => {hideTooltip()} )

    const call = document.getElementById('call');
    call.addEventListener('mouseenter', function () {
        showTooltip(call, call.dataset.tooltipText, 'left')
    })

    call.addEventListener('mouseleave', function () {
        hideTooltip()
    })

    // Hide tooltip when clicking elsewhere on the page
    document.addEventListener('click', function() {
        hideTooltip();
    });

    // Update tooltip position on window resize if it's visible
    window.addEventListener('resize', function() {
        if (currentTooltipElement && tooltip.textContent) {
            showTooltip(currentTooltipElement, tooltip.textContent);
        }
    });
});
